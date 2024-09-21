import http from 'k6/http';
import { check, sleep } from "k6";

// Load batch paypload
const payload = open('./batch-payload.json');

export const options = {
    scenarios: {
        indiviual: {
            exec: 'indiviual',
            executor: 'constant-arrival-rate',
            preAllocatedVUs: 5,
            maxVUs: 20,
            duration: '2m',
            rate: 30, // 30 request per second, total of 3600 requests in 2 minutes
        },
        batch: {
            exec: 'batch',
            executor: 'per-vu-iterations',
            vus: 10,
            iterations: 5, // per each user iterate 5, total of 50 requests in minute
            maxDuration: '1m', // set max duration of the iteration
        },
    },
};

/**
 * This will test the indiviual api
 */
export function indiviual() {

    // Change the url with your ngrok
    const response = http.post('https://79f3-136-158-39-176.ngrok-free.app/api/individual', 
        {
            "email": "hazle38@example.com", // replace this email from the users table, to update the data
            "name": "Jannie Moreno",
            "first_name": "Hill",
            "last_name": "Wooten"
        }
    );
    check(response, { "status is 200": (r) => r.status === 200 });
    sleep(.300);
}

/**
 * This will test the batch api
 */
export function batch() {
    const params = {
        headers: {
          'Content-Type': 'application/json',
        },
    
    }

    // Change the url with your ngrok
    const response = http.post(
        'https://79f3-136-158-39-176.ngrok-free.app/api/batch',
        payload, 
        params
    );
    check(response, { "status is 200": (r) => r.status === 200 });
    sleep(.300);
}