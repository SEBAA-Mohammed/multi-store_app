import { Head } from '@inertiajs/react';
import { PropsWithChildren } from 'react';

import { Footer } from '@/Components/Footer';
import { Header } from '@/Components/Header';

// import ApplicationLogo from '@/Components/ApplicationLogo';

export default function MainLayout({ title, children }: PropsWithChildren<{ title?: string }>) {
  return (
    // className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    <div>
      {/* <div>
        <Link href="/">
          <ApplicationLogo className="w-20 h-20 fill-current text-gray-500" />
        </Link>
      </div> */}

      <Head>
        <title>{title ? `${title}` : 'My Store'}</title>
      </Head>

      <Header />

      <main className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {children}
      </main>
      <Footer />
    </div>
  );
}
