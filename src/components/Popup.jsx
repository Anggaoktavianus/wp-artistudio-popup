import React, { useEffect, useState } from "react";
import "../styles/popup.scss";

const Popup = ({ pageId }) => {
    const [popupData, setPopupData] = useState(null);
    const [isVisible, setIsVisible] = useState(false);

    useEffect(() => {
        const fetchPopup = async () => {
            try {
                const response = await fetch("/wp-json/artistudio/v1/popup", {
                    credentials: "include",
                });
                const data = await response.json();

                console.log("Fetched popup data:", data); // Debugging

                if (data && Array.isArray(data) && data.length > 0) {
                    const matchedPopup = data.find((popup) => popup.page_id === pageId);
                    if (matchedPopup) {
                        setPopupData(matchedPopup);
                    } else {
                        // Jika tidak ada yang cocok, tampilkan default
                        setPopupData({
                            title: "Default Pop-Up",
                            content: "This is a default pop-up message displayed when no matching data is found.",
                        });
                    }
                } else {
                    // Jika API mengembalikan null atau []
                    setPopupData({
                        title: "Default Pop-Up",
                        content: "This is a default pop-up message displayed when no data is found from the API.",
                    });
                }

                setIsVisible(true);
            } catch (error) {
                console.error("Error fetching popups:", error);
                // Jika API gagal, tampilkan default
                setPopupData({
                    title: "Default Pop-Up",
                    content: "This is a default pop-up message displayed when no data is found due to an error.",
                });
                setIsVisible(true);
            }
        };

        console.log("Fetching popup for pageId:", pageId); // Debugging
        fetchPopup();
    }, [pageId]);

    if (!popupData) return null;

    return (
        <div className={`popup-overlay ${isVisible ? "visible" : ""}`}>
            <div className="popup-content">
                <h2>{popupData.title}</h2>
                <p>{popupData.content}</p>
                <button onClick={() => setIsVisible(false)}>Close</button>
            </div>
        </div>
    );
};

export default Popup;
