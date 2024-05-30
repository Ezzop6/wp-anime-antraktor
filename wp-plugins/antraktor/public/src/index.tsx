import * as React from "react";
import { createRoot } from "react-dom/client";
import App from "./App";
import "./sass/style.scss";

const container = document.getElementById("antraktor-admin-react-div");
const root = createRoot(container);
console.log("Root", root);
root.render(<App />);
