import { Currency } from '@/Components/ui/currency';
import { Product } from '@/types';
import { Button } from '@/Components/ui/button';
import { ShoppingCart } from 'lucide-react';

interface ProductInfoProps {
  data: Product;
}

export function ProductInfo({ data }: ProductInfoProps) {
  // const cart = useCart();

  // const onAddToCart = () => {
  //   cart.addItem(data);
  // }
  return (
    <div>
      <h1 className="text-3xl font-bold text-gray-900">{data.designation}</h1>
      <div className="mt-3 flex items-end justify-between">
        {/* text-2xl text-gray-900 */}
        <Currency value={data?.prix_ht} />
      </div>
      <hr className="my-4" />
      {/* <div className="flex flex-col gap-y-6">
        <div className="flex items-center gap-x-4">
          <h3 className="font-semibold text-black">Size:</h3>
          <div>
            {data?.size?.value}
          </div>
        </div>
        <div className="flex items-center gap-x-4">
          <h3 className="font-semibold text-black">Color:</h3>
          <div className="h-6 w-6 rounded-full border border-gray-600" style={{ backgroundColor: data?.color?.value }} />
        </div>
      </div> */}
      <div className="mt-10 flex items-center gap-x-3">
        <Button
          className="flex items-center gap-x-2 whitespace-nowrap"
          // onClick={onAddToCart}
        >
          Add To Cart
          <ShoppingCart size={20} />
        </Button>
      </div>
    </div>
  );
}
