import { Billboard } from '@/Components/Billboard';
import { ProductList } from '@/Components/ProductList';
import { useTypedPage } from '@/Hooks/typed-page';
import { MainLayout } from '@/Layouts/MainLayout';
import { Product } from '@/types';

interface HomeProps {
  products: Product[];
}

export default function Home({ products }: HomeProps) {
  const { store } = useTypedPage().current;

  return (
    <div className="space-y-10 pb-10">
      <Billboard url={store.billboard_url} header={store.header} />
      <div className="flex flex-col gap-y-8 px-4 sm:px-6 lg:px-8">
        <ProductList title="Featured Products" items={products} />
      </div>
    </div>
  );
}

Home.layout = (page: any) => <MainLayout title="Home">{page}</MainLayout>;
