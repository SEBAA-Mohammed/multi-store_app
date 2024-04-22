import { Link } from '@inertiajs/react';

import { Container } from '@/Components/ui/container';
import { MainNav } from '@/Components/MainNav';

export function NavBar() {
  return (
    <header className="border-b">
      <Container>
        <div className="relative px-4 sm:px-6 lg:px-8 flex h-16 items-center">
          <Link href="/" className="ml-4 flex lg:ml-0 gap-x-2">
            <p className="font-bold text-xl">STORE</p>
          </Link>
        </div>
        <MainNav data={[]} />
      </Container>
    </header>
  );
}
