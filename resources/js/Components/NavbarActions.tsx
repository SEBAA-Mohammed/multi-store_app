import { router } from '@inertiajs/react';
import { ShoppingBag } from 'lucide-react';

import { CartButton } from '@/Components/ui/cart-button';

export function NavbarActions() {
  return (
    <div className="ml-auto flex items-center gap-x-4">
      <CartButton
        onClick={() => router.visit(route('cart'))}
        className="flex items-center rounded-full bg-black px-4 py-2"
      >
        <ShoppingBag size={20} color="white" />
        <span className="ml-2 text-sm font-medium text-white">0{/* {cart.items.length} */}</span>
      </CartButton>
    </div>
  );
}
