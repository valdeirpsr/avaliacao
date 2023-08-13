declare type Product = {
  id: number,
  name: string,
  description: string,
  voltage: string,
  manufacturer: string,
  edit: string,
};

declare type ProductCols = { id: keyof Product, text: string }[];

declare type SelectManufacturer = { value: string, text?: string };

declare module '@inertiajs/core' {
  interface PageProps extends InertiaPageProps, AppPageProps {}
}
