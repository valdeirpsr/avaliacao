declare type Product = {
  id: number,
  name: string,
  description: string,
  voltage: string,
  manufacturer: string,
};

declare type ProductCols = { id: keyof Product, text: string }[];
