import axios from "axios";

const url = 'http://localhost:8000';

async function registerGoogle() {
    window.location.href = `${url}/auth/google`;
}

async function getUser(token) {

    const res = await axios.get(`${url}/api/user`, {
        headers: {
            Authorization: `Bearer ${token}`
        }
    });
    return res.data;
}

const comManager = {
    registerGoogle,
    getUser
};
  
export default comManager;