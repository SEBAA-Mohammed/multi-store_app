import { ShoppingCart } from 'lucide-react';

import { Currency } from '@/Components/ui/currency';
import { Button } from '@/Components/ui/button';
import { Product } from '@/types';
// import useCart from "@/hooks/use-cart";

interface InfoProps {
  data: Product;
}

export function Info({ data }: InfoProps) {
  //   const cart = useCart();

  const onAddToCart = () => {
    // cart.addItem(data);
  };

  return (
    <div>
      <h1 className="text-3xl font-bold text-gray-900">{data.designation}</h1>
      <div className="mt-3 flex items-end justify-between">
        <Currency value={data?.price} className="text-2xl text-gray-900" />
      </div>
      <hr className="my-4" />
      <div className="flex flex-col gap-y-6">
        <div className="flex items-center gap-x-4">
          <h3 className="font-semibold text-black">Brand:</h3>
          <div>{data?.brand?.name}</div>
        </div>
        <div className="flex items-center gap-x-4">
          <h3 className="font-semibold text-black">Unit:</h3>
          <div>{data?.unit?.name}</div>
        </div>
      </div>
      <div className="mt-10 flex items-center gap-x-3">
        <Button onClick={onAddToCart} className="flex items-center gap-x-2">
          Add To Cart
          <ShoppingCart size={20} />
        </Button>
      </div>
    </div>
  );
}
