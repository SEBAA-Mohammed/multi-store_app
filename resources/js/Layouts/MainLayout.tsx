import { Head } from '@inertiajs/react';
import { Fragment, PropsWithChildren } from 'react';

import { Footer } from '@/Components/Footer';
import { Header } from '@/Components/Header';
import { PreviewModal } from '@/Components/PreviewModal';

export function MainLayout({ title, children }: PropsWithChildren<{ title?: string }>) {
  return (
    <Fragment>
      <Head>
        <title>{title ? `${title}` : 'My Store'}</title>
      </Head>

      <PreviewModal />

      <Header />

      <main>{children}</main>

      <Footer />
    </Fragment>
  );
}
