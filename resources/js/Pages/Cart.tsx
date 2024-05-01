import { CartItem } from '@/Components/CartItem';
import { Summary } from '@/Components/Summary';
import { Container } from '@/Components/ui/container';
import { useCart } from '@/Contexts/CartContext';
import { MainLayout } from '@/Layouts/MainLayout';

export default function Cart() {
  const { items } = useCart();

  return (
    <div className="bg-white">
      <Container>
        <div className="px-4 py-16 sm:px-6 lg:px-8">
          <h1 className="text-3xl font-bold text-black">Shopping Cart</h1>
          <div className="mt-12 lg:grid lg:grid-cols-12 lg:items-start gap-x-12">
            <div className="lg:col-span-7">
              {items.length === 0 && <p className="text-neutral-500">No items added to cart.</p>}
              <ul>
                {items.map((item) => (
                  <CartItem key={item.id} data={item} />
                ))}
              </ul>
            </div>
            <Summary />
          </div>
        </div>
      </Container>
    </div>
  );
}

Cart.layout = (page: any) => <MainLayout title="Cart">{page}</MainLayout>;
