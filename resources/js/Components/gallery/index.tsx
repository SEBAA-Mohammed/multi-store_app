import { Tab } from '@headlessui/react';

import { GalleryTab } from './gallery-tab';
import { ProductImage } from '@/types';

interface GalleryProps {
  images?: ProductImage[];
}

export const Gallery: React.FC<GalleryProps> = ({ images = [] }) => {
  return (
    <Tab.Group as="div" className="flex flex-col-reverse">
      <div className="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
        <Tab.List className="grid grid-cols-4 gap-6">
          {images.map((image) => (
            <GalleryTab key={image.id} image={image} />
          ))}
        </Tab.List>
      </div>
      <Tab.Panels className="aspect-square w-full">
        {images.map(({ id, image_url }) => (
          <Tab.Panel key={id}>
            <div className="aspect-square relative h-full w-full sm:rounded-lg overflow-hidden">
              <img src={image_url} alt="Image" className="object-cover object-center" />
            </div>
          </Tab.Panel>
        ))}
      </Tab.Panels>
    </Tab.Group>
  );
};
