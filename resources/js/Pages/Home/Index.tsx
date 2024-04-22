import MainLayout from '@/Layouts/MainLayout';

export default function Index({ products }) {
  console.log(products);

  return (
    <MainLayout title="Home">
      <div className="text-8xl">
        <h1>Index</h1>
      </div>
    </MainLayout>
  );
}
