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

async function userRegister(name, username, email, password, password_confirmation) {
    const res = await axios.post(`${url}/api/register`, {
        name,
        username,
        email,
        password,
        password_confirmation
    });
    return res.data;
}

async function userLogin(email, password) {
    const res = await axios.post(`${url}/api/login`, {
        email,
        password
    });
    return res.data;
}

const comManager = {
    registerGoogle,
    getUser,
    userRegister,
    userLogin
};
  
export default comManager;