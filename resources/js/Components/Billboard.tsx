import { useTypedPage } from '@/Hooks/typed-page';

interface BillboardProps {
  billboardUrl: string | undefined;
}

export function Billboard({ billboardUrl }: BillboardProps) {
  const { store } = useTypedPage().current;
  return (
    <div className="p-4 sm:p-6 lg:p-8 rounded-xl overflow-hidden">
      <div
        style={{ backgroundImage: `url(${billboardUrl})` }}
        className="rounded-xl relative aspect-square md:aspect-[2.4/1] overflow-hidden bg-cover"
      >
        <div className="h-full w-full flex flex-col justify-center items-center text-center gap-y-8">
          <div className="font-bold text-3xl sm:text-5xl lg:text-6xl sm:max-w-xl max-w-xs">
            {store?.header}
          </div>
        </div>
      </div>
    </div>
  );
}
