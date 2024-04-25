import { MainLayout } from '@/Layouts/MainLayout';

export default function Product() {
  return (
    <div className="">
      <h1>Product Page</h1>
    </div>
  );
}

Product.layout = (page: any) => <MainLayout title="Product">{page}</MainLayout>;
