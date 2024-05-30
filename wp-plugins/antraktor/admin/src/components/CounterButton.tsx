import * as React from "react";

const CounterButton: React.FC = () => {
  const [count, setCount] = React.useState(0);

  return (
    <div>
      <button id="TESTING" onClick={() => setCount(count + 1)}>
        add one
      </button>

      <button onClick={() => setCount(count - 1)}>subtract one</button>
      <p>Count: {count}</p>
    </div>
  );
};

export default CounterButton;
