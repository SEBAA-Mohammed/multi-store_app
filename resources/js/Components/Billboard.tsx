import { Fragment } from 'react';

interface BillboardProps {
  url: string;
  header: string;
}

export function Billboard({ url, header }: Partial<BillboardProps>) {
  return (
    <Fragment>
      {url != undefined && (
        <div className="p-4 sm:p-6 lg:p-8 rounded-xl overflow-hidden">
          <div
            style={{ backgroundImage: `url(${url})` }}
            className="rounded-xl relative aspect-square md:aspect-[2.4/1] overflow-hidden bg-cover"
          >
            {header != undefined && (
              <div className="h-full w-full flex flex-col justify-center items-center text-center gap-y-8">
                <div className="font-bold text-3xl sm:text-5xl lg:text-6xl sm:max-w-xl max-w-xs">
                  {header}
                </div>
              </div>
            )}
          </div>
        </div>
      )}
    </Fragment>
  );
}
