export interface Property{
    id?: number;
    name: string;
    description: string;
    location: string;
    postal_code: number;
    n_rooms: number;
    n_baths: number;
    property_type: string;
    created_at?: string;
    update_at: string;
}