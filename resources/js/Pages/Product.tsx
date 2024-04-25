import { ProductInfo } from '@/Components/ProductInfo';
import { ProductList } from '@/Components/ProductList';
import { Gallery } from '@/Components/gallery';
import { Container } from '@/Components/ui/container';
import { MainLayout } from '@/Layouts/MainLayout';
import { Product as IProduct } from '@/types';

interface ProductProps {
  product: IProduct;
  suggestedProducts: IProduct[];
}

export default function Product({ product, suggestedProducts }: ProductProps) {
  console.log(suggestedProducts);

  return (
    <div className="bg-white">
      <Container>
        <div className="px-4 py-10 sm:px-6 lg:px-8">
          <div className="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
            <Gallery images={product.images} />
            <div className="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
              <ProductInfo data={product} />
            </div>
          </div>
          <hr className="my-10" />
          <ProductList title="Related Items" items={suggestedProducts} />
        </div>
      </Container>
    </div>
  );
}

Product.layout = (page: any) => <MainLayout title="Product">{page}</MainLayout>;
