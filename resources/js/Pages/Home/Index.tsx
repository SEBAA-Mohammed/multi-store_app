import MainLayout from '@/Layouts/MainLayout';
import { PageProps } from '@/types';
import { usePage } from '@inertiajs/react';

export default function Index() {
  const { store } = usePage<PageProps>().props.current;

  return (
    <MainLayout title="Home">
      <div className="text-8xl">
        <h1>Index</h1>
      </div>
    </MainLayout>
  );
}
