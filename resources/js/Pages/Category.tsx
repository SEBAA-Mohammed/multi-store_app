import { MainLayout } from '@/Layouts/MainLayout';
import { Product } from '@/types';

interface CategoryProps {
  products: Product[];
}

export default function Category({ products }: CategoryProps) {
  console.log(products);

  return (
    <div className="">
      <h1>Category</h1>
    </div>
  );
}

Category.layout = (page: any) => <MainLayout title="Category">{page}</MainLayout>;
