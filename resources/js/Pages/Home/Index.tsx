import { Billboard } from '@/Components/Billboard';
import MainLayout from '@/Layouts/MainLayout';

export default function Index() {
  return (
    <MainLayout title="Home">
      <div className="space-y-10 pb-10">
        <Billboard />
      </div>
    </MainLayout>
  );
}
