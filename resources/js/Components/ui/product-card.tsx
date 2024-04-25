import { MouseEventHandler } from 'react';
import { router, usePage } from '@inertiajs/react';
import { Expand, ShoppingCart } from 'lucide-react';

import Currency from '@/Components/ui/currency';
import IconButton from '@/Components/ui/icon-button';
// import usePreviewModal from "@/hooks/use-preview-modal";
// import useCart from "@/hooks/use-cart";
import { PageProps, Product } from '@/types';

interface ProductCard {
  data: Product;
}

export const ProductCard: React.FC<ProductCard> = ({ data }) => {
  const { auth, current } = usePage<PageProps>().props;

  // const previewModal = usePreviewModal();
  // const cart = useCart();
  // const router = useRouter();

  const onPreview: MouseEventHandler<HTMLButtonElement> = (event) => {
    event.stopPropagation();

    // previewModal.onOpen(data);
  };

  const onAddToCart: MouseEventHandler<HTMLButtonElement> = (event) => {
    event.stopPropagation();

    // cart.addItem(data);
  };

  return (
    <div
      onClick={() =>
        router.visit(
          route('product', {
            user: auth.user.username,
            store: current.store.slug,
            product: data.id,
          }),
        )
      }
      className="bg-white group cursor-pointer rounded-xl border p-3 space-y-4"
    >
      {/* Image & actions */}
      <div className="aspect-square rounded-xl bg-gray-100 relative">
        {/* <img
          src={data.images?.[0]?.url}
          alt=""
          className="aspect-square object-cover rounded-md"
        /> */}
        <div className="opacity-0 group-hover:opacity-100 transition absolute w-full px-6 bottom-5">
          <div className="flex gap-x-6 justify-center">
            <IconButton onClick={onPreview} icon={<Expand size={20} className="text-gray-600" />} />
            <IconButton
              onClick={onAddToCart}
              icon={<ShoppingCart size={20} className="text-gray-600" />}
            />
          </div>
        </div>
      </div>
      {/* Description */}
      <div>
        <p className="font-semibold text-lg">{data.designation}</p>
        <p className="text-sm text-gray-500">
          Category name
          {/* {data.category?.name} */}
        </p>
      </div>
      {/* Price & Reiew */}
      <div className="flex items-center justify-between">
        <Currency value={data?.prix_ht} />
      </div>
    </div>
  );
};
