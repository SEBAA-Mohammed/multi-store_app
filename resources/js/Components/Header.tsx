import { Link, usePage } from '@inertiajs/react';

import { Container } from '@/Components/ui/container';
import { NavigationBar } from '@/Components/NavigationBar';
import { PageProps } from '@/types';

export function Header() {
  const { categories } = usePage<PageProps>().props.current;

  return (
    <header className="border-b">
      <Container>
        <div className="relative px-4 sm:px-6 lg:px-8 flex h-16 items-center">
          <Link href="/" className="ml-4 flex lg:ml-0 gap-x-2">
            <p className="font-bold text-xl">STORE</p>
          </Link>
        </div>
        <NavigationBar data={categories} />
      </Container>
    </header>
  );
}
