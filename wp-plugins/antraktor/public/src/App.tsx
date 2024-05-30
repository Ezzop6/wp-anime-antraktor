import * as React from "react";
import CounterButton from "./components/CounterButton";

const App: React.FC = () => {
  return (
    <div>
      <p>Public part</p>
      <CounterButton />
    </div>
  );
};

export default App;
