
# Laravel rest-api

This project is a simple example of an api built in REST architecture using Laravel.#
#### Create a new store
```http
  POST /api/store
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name` | `string` | **Required**. The name of the store |
| `description` | `string` | **Required**. A description to the Store |

#
#### List of all registered stores
```http
  GET /api/stores
```
| Params   | Type       | Description                           |
| :---------- | :--------- | :---------------------------------- |
| `page` | `int` | **Optional**. The page wich you want to fetch |

#
#### Returns a store by id
```http
  GET /api/store/{id}
  ```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| **N/A**    |  | |

#
#### Update a store
```http
  PUT /api/store/{id}
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name` | `string` | **Required**. New name |
| `description` | `string` | **Required**. New description |

#
#### Delete a store
```http
  DELETE /api/store/{id}
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| **N/A**    |  | |

#
#### Register a product of a store
```http
  POST /api/store/{id}/products
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name` | `string` |  **Required**. The name of the product |
| `description` | `string` | **Required**. A description to the product |
| `price` | `float` | **Required**. The price of the product |

#
#### All products of a store
```http
  GET /api/store/{id}/products
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| **N/A**    |  |  |

#
#### Returns a product by id
```http
  GET /api/store/{id}/products/{id}
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| **N/A**    |  | |

#
#### Update a product
```http
  PUT /api/store/{id}/products/{id}
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name` | `string` | **Required**. New name |
| `description` | `string` | **Required**. New description |
| `price` | `float` | **Required**. New price |

#
#### Delete a product
```http
  DELETE /api/store/{id}/products/{id}
```
| Params   | Type       | Description                                   |
| :---------- | :--------- | :------------------------------------------ |
| **N/A**    |  | |

