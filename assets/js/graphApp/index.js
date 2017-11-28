import React from 'react'
import ReactDOM from 'react-dom'
import { Provider } from 'react-redux'
import { createStore } from 'redux'
import makeGraph from './reducers'
import App from './components/App'

let store = createStore(makeGraph)

ReactDOM.render(
<Provider store={store}>
    <App />
</Provider>,
document.getElementById('graph')
);