export function Footer() {
  return (
    <footer className="bg-white border-t">
      <div className="mx-auto py-10">
        <p className="text-center text-xs text-black">
          &copy; {new Date().getFullYear().toString()} FakeStoreName, Inc. All right reserved
        </p>
      </div>
    </footer>
  );
}
