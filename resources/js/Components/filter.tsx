import { Button } from '@/Components/ui/button';
import { useFilterCategory } from '@/Hooks/filter-category';
import { cn } from '@/lib/utils';
import { Brand, Unit } from '@/types';

interface FilterProps {
  data: (Brand | Unit)[];
  name: string;
  queryKey: string;
}

export const Filter: React.FC<FilterProps> = ({ data, name, queryKey }) => {
  const { onClick, selectedValue } = useFilterCategory(queryKey);

  return (
    <div className="mb-8">
      <h3 className="text-lg font-semibold">{name}</h3>
      <hr className="my-4" />
      <div className="flex flex-wrap gap-2">
        {data.map(({ id: filterId, name }) => (
          <div key={filterId} className="flex items-center">
            <Button
              className={cn(
                'rounded-md text-sm text-gray-800 p-2 bg-white border border-gray-300 hover:text-white',
                selectedValue === filterId && 'bg-black text-white',
              )}
              onClick={() => onClick({ [queryKey]: filterId })}
            >
              {name}
            </Button>
          </div>
        ))}
      </div>
    </div>
  );
};
