import axios from "axios";

async function registerGoogle() {
    window.location.href = 'http://localhost:8000/auth/google';
}

const comManager = {
    registerGoogle
};
  
export default comManager;