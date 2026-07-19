async function apiFetch(url, options = {}) {
    const token = localStorage.getItem('api_token');

    const response = await fetch(url, {
        ...options,
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json',
            ...(token ? { Authorization: `Bearer ${token}` } : {}),
            ...options.headers,
        },
    });

    if (!response.ok) {
        const error = await response.json().catch(() => ({ message: 'Error desconocido' }));
        const err = new Error(error.message ?? 'Error en la petición');
        err.status = response.status;
        err.errors = error.errors ?? {};
        throw err;
    }

    return response.json();
}

export const apiGet = (url) => apiFetch(url);

export const apiPost = (url, data) =>
    apiFetch(url, { method: 'POST', body: JSON.stringify(data) });

export const apiPut = (url, data) =>
    apiFetch(url, { method: 'PUT', body: JSON.stringify(data) });

export const apiDelete = (url) =>
    apiFetch(url, { method: 'DELETE' });
