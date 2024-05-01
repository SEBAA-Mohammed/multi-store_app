import { Gallery } from '@/Components/gallery';
import { Info } from '@/Components/Info';
import { Modal } from '@/Components/ui/modal';
import { usePreviewModal } from '@/Contexts/PreviewModalContext';

export function PreviewModal() {
  const { selectedProduct, isOpen, onClose } = usePreviewModal();
  //   const product = usePreviewModal((state) => state.data);

  if (!selectedProduct) {
    return null;
  }

  return (
    <Modal open={isOpen} onClose={onClose}>
      <div className="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
        <div className="sm:col-span-4 lg:col-span-5">
          <Gallery images={selectedProduct.images} />
        </div>
        <div className="sm:col-span-8 lg:col-span-7">
          <Info data={selectedProduct} />
        </div>
      </div>
    </Modal>
  );
}
