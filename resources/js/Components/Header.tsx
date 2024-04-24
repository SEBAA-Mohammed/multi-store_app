import { Link, usePage } from '@inertiajs/react';

import { Container } from '@/Components/ui/container';
import { NavigationBar } from '@/Components/NavigationBar';
import { PageProps } from '@/types';
import { NavbarActions } from '@/Components/NavbarActions';

export function Header() {
  const { current, auth } = usePage<PageProps>().props;

  console.log(auth.user);

  return (
    <header className="border-b">
      <Container>
        <div className="relative px-4 sm:px-6 lg:px-8 flex h-16 items-center">
          <Link
            href={route('cart', { user: auth.user.username, store: current.store.slug })}
            className="ml-4 flex lg:ml-0 gap-x-2"
          >
            <p className="font-bold text-xl">STORE</p>
          </Link>
          <NavigationBar data={current.categories} />
          <NavbarActions />
        </div>
      </Container>
    </header>
  );
}
