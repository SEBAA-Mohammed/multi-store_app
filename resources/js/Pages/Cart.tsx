import { MainLayout } from '@/Layouts/MainLayout';
import { Fragment } from 'react';

export default function Index() {
  return (
    <Fragment>
      <div className="space-y-10 pb-10">CART PAGE</div>
    </Fragment>
  );
}

Index.layout = (page: any) => <MainLayout title="Cart">{page}</MainLayout>;
