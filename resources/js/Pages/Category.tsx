import { Billboard } from '@/Components/Billboard';
import { Filter } from '@/Components/filter';
import { MobileFilters } from '@/Components/MobileFilter';
import { Container } from '@/Components/ui/container';
import { NoResults } from '@/Components/ui/no-result';
import { ProductCard } from '@/Components/ui/product-card';
import { MainLayout } from '@/Layouts/MainLayout';
import { Category as ICategory, Product, Brand } from '@/types';

interface CategoryProps {
  products: Product[];
  category: ICategory;
  brands: Brand[];
  // units: Unit[];
}

export default function Category({ category, products, brands }: CategoryProps) {
  return (
    <div className="bg-white">
      <Container>
        <Billboard url={category.url} />
        <div className="px-4 sm:px-6 lg:px-8 pb-24">
          <div className="lg:grid lg:grid-cols-5 lg:gap-x-8">
            <MobileFilters brands={brands} />
            <div className="hidden lg:block">
              <Filter name="Brands" queryKey="brand" data={brands} />
              {/* <Filter name="Units" queryKey="unit" data={units} /> */}
            </div>
            <div className="mt-6 lg:col-span-4 lg:mt-0">
              {products.length === 0 && <NoResults />}
              <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                {products.map((item) => (
                  <ProductCard key={item.id} data={item} />
                ))}
              </div>
            </div>
          </div>
        </div>
      </Container>
    </div>
  );
}

Category.layout = (page: any) => <MainLayout title="Category">{page}</MainLayout>;
