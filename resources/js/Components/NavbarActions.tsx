import { route } from 'ziggy-js';
import { Link, router } from '@inertiajs/react';
import { ShoppingBag } from 'lucide-react';

import { CartButton } from '@/Components/ui/cart-button';
import { useCart } from '@/Contexts/cart-context';

export function NavbarActions() {
  const { items } = useCart();

  return (
    <div className="ml-auto flex items-center gap-x-4">
      <Link
        href={route('logout')}
        method="post"
        as="button"
        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        Log Out
      </Link>
      <CartButton
        onClick={() => router.visit(route('cart'))}
        className="flex items-center rounded-full bg-black px-4 py-2"
      >
        <ShoppingBag size={20} color="white" />
        <span className="ml-2 text-sm font-medium text-white">{items.length}</span>
      </CartButton>
    </div>
  );
}
