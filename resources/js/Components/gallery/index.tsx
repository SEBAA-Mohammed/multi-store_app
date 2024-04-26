import { Tab } from '@headlessui/react';

import { GalleryTab } from '@/Components/gallery/gallery-tab';
import { ProductImage } from '@/types';

interface GalleryProps {
  images?: ProductImage[];
}

export const Gallery: React.FC<GalleryProps> = ({ images = [] }) => {
  return (
    <Tab.Group as="div" className="flex flex-col-reverse">
      <div className="mx-auto mt-6 w-full max-w-2xl lg:max-w-none">
        <Tab.List className="grid grid-cols-4 gap-6">
          {images.map((image) => (
            <GalleryTab key={image.id} image={image} />
          ))}
        </Tab.List>
      </div>
      <Tab.Panels className="aspect-square w-full">
        {images.map(({ id, url }) => (
          <Tab.Panel key={id}>
            <div className="aspect-square relative h-full w-full sm:rounded-lg overflow-hidden">
              <img src={url} alt="Image" className="h-full w-full object-cover object-center" />
            </div>
          </Tab.Panel>
        ))}
      </Tab.Panels>
    </Tab.Group>
  );
};
