import { Link, usePage } from '@inertiajs/react';
import { FC } from 'react';

import { cn } from '@/lib/utils';

interface MainNav {
  data: any;
}

export const MainNav: FC<MainNav> = ({ data }) => {
  const { url } = usePage();

  const routes = data.map((route) => ({
    href: `/category/${route.id}`,
    label: route.name,
    active: url === `/category/${route.id}`,
  }));

  return (
    <nav className="mx-6 flex items-center space-x-4 lg:space-x-6">
      {routes.map((route) => (
        <Link
          key={route.href}
          href={route.href}
          className={cn(
            'text-sm font-medium transition-colors hover:text-black',
            route.active ? 'text-black' : 'text-neutral-500',
          )}
        >
          {route.label}
        </Link>
      ))}
    </nav>
  );
};
