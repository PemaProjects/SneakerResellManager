import axios from 'axios';
import mysql from 'mysql2/promise';

let page = 1;
let sneakers = [];
let url = `https://ac.cnstrc.com/browse/group_id/sneakers?c=ciojs-client-2.35.2&key=key_XT7bjdbvjgECO5d8&i=952f3f10-6fb3-4150-aafc-64d435207c0d&s=3&page=${page}&num_results_per_page=50&sort_by=relevance&sort_order=descending&fmt_options%5Bhidden_fields%5D=gp_lowest_price_cents_2&fmt_options%5Bhidden_fields%5D=gp_instant_ship_lowest_price_cents_2&fmt_options%5Bhidden_facets%5D=gp_lowest_price_cents_2&fmt_options%5Bhidden_facets%5D=gp_instant_ship_lowest_price_cents_2&variations_map=%7B%22group_by%22%3A%5B%7B%22name%22%3A%22product_condition%22%2C%22field%22%3A%22data.product_condition%22%7D%2C%7B%22name%22%3A%22box_condition%22%2C%22field%22%3A%22data.box_condition%22%7D%5D%2C%22values%22%3A%7B%22min_regional_price%22%3A%7B%22aggregation%22%3A%22min%22%2C%22field%22%3A%22data.gp_lowest_price_cents_2%22%7D%2C%22min_regional_instant_ship_price%22%3A%7B%22aggregation%22%3A%22min%22%2C%22field%22%3A%22data.gp_instant_ship_lowest_price_cents_2%22%7D%7D%2C%22dtype%22%3A%22object%22%7D&qs=%7B%22features%22%3A%7B%22display_variations%22%3Atrue%7D%2C%22feature_variants%22%3A%7B%22display_variations%22%3A%22matched%22%7D%7D&_dt=1718742646763`;

let response

async function getSneakers() {
    do {
        response = await axios.get(url);
        response.data.response.results.forEach(sneaker => {
            const sneakerData = {
                'name': sneaker.value,
                'img': sneaker.data.image_url
            }
            sneakers.push(sneakerData);
        });
        page++;
        url = `https://ac.cnstrc.com/browse/group_id/sneakers?c=ciojs-client-2.35.2&key=key_XT7bjdbvjgECO5d8&i=952f3f10-6fb3-4150-aafc-64d435207c0d&s=3&page=${page}&num_results_per_page=50&sort_by=relevance&sort_order=descending&fmt_options%5Bhidden_fields%5D=gp_lowest_price_cents_2&fmt_options%5Bhidden_fields%5D=gp_instant_ship_lowest_price_cents_2&fmt_options%5Bhidden_facets%5D=gp_lowest_price_cents_2&fmt_options%5Bhidden_facets%5D=gp_instant_ship_lowest_price_cents_2&variations_map=%7B%22group_by%22%3A%5B%7B%22name%22%3A%22product_condition%22%2C%22field%22%3A%22data.product_condition%22%7D%2C%7B%22name%22%3A%22box_condition%22%2C%22field%22%3A%22data.box_condition%22%7D%5D%2C%22values%22%3A%7B%22min_regional_price%22%3A%7B%22aggregation%22%3A%22min%22%2C%22field%22%3A%22data.gp_lowest_price_cents_2%22%7D%2C%22min_regional_instant_ship_price%22%3A%7B%22aggregation%22%3A%22min%22%2C%22field%22%3A%22data.gp_instant_ship_lowest_price_cents_2%22%7D%7D%2C%22dtype%22%3A%22object%22%7D&qs=%7B%22features%22%3A%7B%22display_variations%22%3Atrue%7D%2C%22feature_variants%22%3A%7B%22display_variations%22%3A%22matched%22%7D%7D&_dt=1718742646763`;
        console.log(page)
    } while (response.data.response.results.length !== 0);
}

async function insertSneakers() {
    const connection = await mysql.createConnection({
        host: 'db',
        user: 'root',
        password: 'root',
        database: 'snkrs'
    });

    try {
        await connection.query('CREATE TABLE IF NOT EXISTS sneakers (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), img VARCHAR(255))');
        for (const sneaker of sneakers) {
            const [rows] = await connection.query('SELECT * FROM sneakers WHERE name = ?', [sneaker.name]);

            if (rows.length === 0) {
                await connection.query('INSERT INTO sneakers (name, img) VALUES (?, ?)', [sneaker.name, sneaker.img]);
                console.log(`Sneaker "${sneaker.name}" insertado correctamente`);
            } else {
                console.log(`Sneaker "${sneaker.name}" ya existe en la base de datos, no se insertó`);
            }
        }
    } catch (error) {
        console.error('Error insertando datos:', error);
    } finally {
        await connection.end();
    }
}
await getSneakers();
await insertSneakers();