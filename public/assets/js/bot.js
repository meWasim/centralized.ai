
        // Toggle the chat window visibility
        function toggleChatWindow() {
            const chatWindow = document.getElementById('chat-window');
            chatWindow.style.display = chatWindow.style.display === 'none' || chatWindow.style.display === '' ? 'flex' :
                'none';
        }

        // Handle Enter key for sending a message
        function handleEnter(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        }

        // Send message to the server
        function sendMessage() {
            const userInput = document.getElementById('user-input').value;

            if (!userInput.trim()) return;

            addMessageToChat('You: ' + userInput, 'user');
            document.getElementById('user-input').value = '';

            fetch('/chat', {
                    method: 'POST',
                    body: JSON.stringify({
                        question: userInput
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => response.json())
                .then(data => {
                    addMessageToChat(data.answer, 'bot', true);
                })
                .catch(error => {
                    addMessageToChat('Bot: I couldn\'t reach the server. Please try again.', 'bot');
                });
        }

        // Add message to chat content
        function addMessageToChat(message, sender, isBot = false) {
            const chatContent = document.getElementById('chat-content');
            const messageDiv = document.createElement('div');
            messageDiv.className = sender;

            const messageSpan = document.createElement('span');
            messageSpan.className = 'message';
            messageSpan.textContent = message;

            if (isBot) {
                messageSpan.addEventListener('click', () => {
                    navigator.clipboard.writeText(message).then(() => {
                        messageSpan.classList.add('copied');
                        setTimeout(() => {
                            messageSpan.classList.remove('copied');
                        }, 1500);
                    });
                });
            }

            messageDiv.appendChild(messageSpan);
            chatContent.appendChild(messageDiv);

            chatContent.scrollTop = chatContent.scrollHeight;
        }

