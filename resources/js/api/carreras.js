import { apiDelete, apiGet, apiPost, apiPut } from './client';
import { API_CARRERAS } from '../components/Constantes';

export const getCarreras = (page = 1, filters = {}) => {
    const params = new URLSearchParams({ page, ...filters });
    return apiGet(`${API_CARRERAS}?${params}`);
};

export const getCarrera = (id) =>
    apiGet(`${API_CARRERAS}/${id}`);

export const createCarrera = (data) =>
    apiPost(API_CARRERAS, data);

export const updateCarrera = (id, data) =>
    apiPut(`${API_CARRERAS}/${id}`, data);

export const deleteCarrera = (id) =>
    apiDelete(`${API_CARRERAS}/${id}`);
