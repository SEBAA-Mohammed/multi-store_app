import { X } from 'lucide-react';

import { IconButton } from '@/Components/ui/icon-button';
import { Product } from '@/types';
import { useCart } from '@/Contexts/CartContext';
import { Currency } from '@/Components/ui/currency';

interface CartItemProps {
  data: Product;
}

export function CartItem({ data }: CartItemProps) {
  const { removeItem } = useCart();

  const onRemove = () => {
    removeItem(data.id);
  };

  return (
    <li className="flex py-6 border-b">
      <div className="relative h-24 w-24 rounded-md overflow-hidden sm:h-48 sm:w-48">
        <img src={data.images[0].url} alt="" className="h-full w-full object-cover object-center" />
      </div>
      <div className="relative ml-4 flex flex-1 flex-col justify-between sm:ml-6">
        <div className="absolute z-10 right-0 top-0">
          <IconButton onClick={onRemove} icon={<X size={15} />} />
        </div>
        <div className="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
          <div className="flex justify-between">
            <p className=" text-lg font-semibold text-black">{data.designation}</p>
          </div>

          <div className="mt-1 flex text-sm">
            {/* <p className="text-gray-500">{data.color.name}</p>
            <p className="ml-4 border-l border-gray-200 pl-4 text-gray-500">{data.size.name}</p> */}
            <p className="text-gray-500">{data.brand?.name}</p>
            <p className="ml-4 border-l border-gray-200 pl-4 text-gray-500">{data.unit?.name}</p>
          </div>
          <Currency value={data.price} />
        </div>
      </div>
    </li>
  );
}
