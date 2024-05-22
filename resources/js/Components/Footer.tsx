import { useTypedPage } from '@/Hooks/typed-page';

export function Footer() {
  const { current } = useTypedPage();

  return (
    <footer className="bg-white border-t">
      <div className="mx-auto py-10">
        <p className="text-center text-xs text-black">
          &copy; {new Date().getFullYear().toString()} {current.store.name}, Inc. All right reserved
        </p>
        <p className="text-center text-xs text-black">
          Contact us by sending us email to
          <a className="hover:underline hover:text-blue-500" href={`mailto:${current.store.email}`}>
            &nbsp;{current.store.email}
          </a>
          . Or phone us on
          <a className="hover:underline hover:text-blue-500" href={`tel:${current.store.tel}`}>
            &nbsp;{current.store.tel}
          </a>
        </p>
      </div>
    </footer>
  );
}
