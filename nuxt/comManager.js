import axios from "axios";

async function registerGoogle() {
    window.location.href = 'http://localhost:8000/auth/google';
}

async function getUser(token) {

    const res = await axios.get('http://localhost:8000/api/user', {
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