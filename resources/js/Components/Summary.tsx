import { router } from '@inertiajs/react';
import { useEffect } from 'react';
import { route } from 'ziggy-js';

import { Button } from '@/Components/ui/button';
import { Currency } from '@/Components/ui/currency';
import { useCart } from '@/Contexts/cart-context';
import { useToast } from '@/Components/ui/use-toast';
import { isAbleToCheckout } from '@/lib/utils';
import { usePaddle } from '@/Hooks/paddle';
import { useTypedPage } from '@/Hooks/typed-page';

export function Summary() {
  const { auth } = useTypedPage();
  const { items, removeAll } = useCart();
  const { toast } = useToast();
  const { openCheckout, checkoutProcessEvent } = usePaddle();

  useEffect(() => {
    if (checkoutProcessEvent?.status === 'initialized') {
      router.visit(route('checkout', { status: checkoutProcessEvent?.status }));
    }

    if (checkoutProcessEvent?.status === 'completed') {
      toast({ title: 'Success', description: 'Payment completed ✅.' });
      removeAll();
      router.get(route('checkout', { status: checkoutProcessEvent?.status }));
    }

    if (checkoutProcessEvent?.status === 'failed') {
      toast({
        variant: 'destructive',
        title: 'Canceled',
        description: 'Something went wrong ❌.',
      });
      router.visit(route('checkout', { status: checkoutProcessEvent?.status }));
    }
  }, [checkoutProcessEvent]);

  const totalPrice = items.reduce((total, item) => {
    return total + Number(item.price);
  }, 0);

  return (
    <div className="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
      <h2 className="text-lg font-medium text-gray-900">Order summary</h2>
      <div className="mt-6 space-y-4">
        <div className="flex items-center justify-between border-t border-gray-200 pt-4">
          <div className="text-base font-medium text-gray-900">Order total</div>
          <Currency value={totalPrice} />
        </div>
      </div>
      {auth.isLoggedIn ? (
        <Button
          className="w-full mt-6"
          disabled={isAbleToCheckout(items, auth.isLoggedIn)}
          onClick={() => openCheckout(auth.user, items)}
        >
          Checkout
        </Button>
      ) : (
        <Button className="w-full mt-6" onClick={() => router.visit(route('register'))}>
          Register to make checkout
        </Button>
      )}
    </div>
  );
}
