import React from "react";
import { createRoot } from "react-dom/client";
import Popup from "./components/Popup";

const pageId = document.body.dataset.pageId || null;

if (pageId) {
    const root = document.createElement("div");
    root.id = "popup-root";
    document.body.appendChild(root);

    createRoot(root).render(<Popup pageId={pageId} />);
}
