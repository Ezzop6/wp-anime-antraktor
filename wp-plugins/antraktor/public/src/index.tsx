import * as React from "react";
import { createRoot } from "react-dom/client";
import App from "./App";
import "./sass/style.scss";

const container = document.getElementById("antraktor-public-react-div");
if (container) {
  const root = createRoot(container);
  console.log("Public Part");
  console.log("Current path: ", window.location.pathname);
  console.log("Full path: ", window.location.href);
  console.log("Root", root);
  root.render(<App />);
}
