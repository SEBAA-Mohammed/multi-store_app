import { Link } from '@inertiajs/react';
import { route } from 'ziggy-js';

import { Container } from '@/Components/ui/container';
import { NavigationBar } from '@/Components/NavigationBar';
import { NavbarActions } from '@/Components/NavbarActions';
import { useTypedPage } from '@/Hooks/typed-page';

export function Header() {
  const { current } = useTypedPage();

  return (
    <header className="border-b">
      <Container>
        <div className="relative px-4 sm:px-6 lg:px-8 flex h-16 items-center">
          <Link href={route('home')} className="ml-4 flex lg:ml-0 gap-x-2">
            {current.store.logo_url ? (
              <img src={current.store.logo_url} alt="" className="h-6 w-24" />
            ) : (
              <p className="font-bold text-xl uppercase">{current.store.name}</p>
            )}
          </Link>
          <NavigationBar data={current.categories} />
          <NavbarActions />
        </div>
      </Container>
    </header>
  );
}
