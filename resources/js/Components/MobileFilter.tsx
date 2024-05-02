import { useState } from 'react';
import { Plus, X } from 'lucide-react';
import { Dialog } from '@headlessui/react';

import { IconButton } from '@/Components/ui/icon-button';
import { Button } from '@/Components/ui/button';
import { Brand } from '@/types';

import { Filter } from '@/Components/filter';

interface MobileFiltersProps {
  brands: Brand[];
  // units: Unit[];
}

export const MobileFilters: React.FC<MobileFiltersProps> = ({ brands }) => {
  const [open, setOpen] = useState(false);

  const onOpen = () => setOpen(true);
  const onClose = () => setOpen(false);

  return (
    <>
      <Button onClick={onOpen} className="flex items-center gap-x-2 lg:hidden">
        Filters
        <Plus size={20} />
      </Button>

      <Dialog open={open} as="div" className="relative z-40 lg:hidden" onClose={onClose}>
        {/* Background color and opacity */}
        <div className="fixed inset-0 bg-black bg-opacity-25" />

        {/* Dialog position */}
        <div className="fixed inset-0 z-40 flex">
          <Dialog.Panel className="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-6 shadow-xl">
            {/* Close button */}
            <div className="flex items-center justify-end px-4">
              <IconButton icon={<X size={15} />} onClick={onClose} />
            </div>

            <div className="p-4">
              <Filter queryKey="brand" name="Brands" data={brands} />
              {/* <Filter queryKey="unit" name="Units" data={units} /> */}
            </div>
          </Dialog.Panel>
        </div>
      </Dialog>
    </>
  );
};
