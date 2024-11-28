<div id="chat-icon" onclick="toggleChatWindow()">
    💬
</div>

<div id="chat-window" style="display: none;">
    <div id="chat-header">
        <span>Chatbot</span>
        <button onclick="toggleChatWindow()">✖</button>
    </div>
    <div id="chat-content"></div>
    <div id="chat-footer">
        <input type="text" id="user-input" placeholder="Type your question..." onkeypress="handleEnter(event)">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>
